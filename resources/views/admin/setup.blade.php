@extends('layouts.app')

@section('content')
<div class="p-6 space-y-4">
    <form action="/form-upload" method="POST" enctype="multipart/form-data" class="space-y-2">
        @csrf
        <input type="file" name="form_image" required>
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Upload Form</button>
    </form>

    @if($template)
    <div class="relative border w-full max-w-5xl mx-auto">
        <img src="{{ asset('storage/' . $template->image_path) }}" id="form-image" class="w-full">
        <div id="draggables" class="absolute top-0 left-0 w-full h-full"></div>
    </div>

    <div class="flex gap-2 mt-4">
        <input type="text" id="newFieldName" placeholder="Field name" class="border px-2 py-1">
        <button onclick="addField()" class="bg-green-600 text-white px-3 py-1">Add Field</button>
        <button onclick="saveFields()" class="bg-blue-600 text-white px-3 py-1">Save</button>
    </div>
    @endif
</div>

<script>
    const fields = @json($fields);
    const templateId = {{ $template->id ?? 'null' }};
    const draggables = document.getElementById('draggables');

    function makeDraggable(el) {
        el.draggable = true;
        el.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text/plain', null);
            el.dataset.offsetX = e.offsetX;
            el.dataset.offsetY = e.offsetY;
        });

        draggables.addEventListener('dragover', (e) => e.preventDefault());

        draggables.addEventListener('drop', (e) => {
            const offsetX = parseInt(el.dataset.offsetX);
            const offsetY = parseInt(el.dataset.offsetY);
            el.style.left = (e.offsetX - offsetX) + 'px';
            el.style.top = (e.offsetY - offsetY) + 'px';
        });
    }

    function addField() {
        const name = document.getElementById('newFieldName').value;
        const div = document.createElement('div');
        div.textContent = name;
        div.className = 'absolute bg-yellow-200 text-sm px-1 border border-black cursor-move';
        div.style.left = '10px';
        div.style.top = '10px';
        div.dataset.name = name;
        makeDraggable(div);
        draggables.appendChild(div);
    }

    function saveFields() {
        const items = draggables.querySelectorAll('div');
        const data = Array.from(items).map(div => ({
            name: div.dataset.name,
            x: parseInt(div.style.left),
            y: parseInt(div.style.top),
            font_size: 12
        }));

        fetch('/form-fields/save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({ template_id: templateId, fields: data })
        }).then(res => res.json()).then(res => {
            alert(res.message);
        });
    }

    window.onload = () => {
        fields.forEach(field => {
            const div = document.createElement('div');
            div.textContent = field.field_name;
            div.className = 'absolute bg-yellow-200 text-sm px-1 border border-black cursor-move';
            div.style.left = field.x + 'px';
            div.style.top = field.y + 'px';
            div.dataset.name = field.field_name;
            makeDraggable(div);
            draggables.appendChild(div);
        });
    };
</script>
@endsection
