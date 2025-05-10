<div style="background-image: url('{{ asset('storage/pdf_preview.jpg') }}'); width: 100%; height: 800px; position: relative;">
    <div id="student_name" class="draggable" style="position: absolute; top: 100px; left: 50px;">Student Name</div>
    <div id="birth_date" class="draggable" style="position: absolute; top: 150px; left: 50px;">Birth Date</div>
</div>

<button onclick="saveMapping()">Save Mapping</button>

<script src="https://cdn.jsdelivr.net/npm/interactjs@1.9.18"></script>
<script>
    interact('.draggable')
        .draggable({
            onmove(event) {
                var target = event.target;
                var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

                target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
                target.setAttribute('data-x', x);
                target.setAttribute('data-y', y);
            }
        });

    function saveMapping() {
        const mapping = {};

        document.querySelectorAll('.draggable').forEach(function (field) {
            mapping[field.id] = {
                x: field.getAttribute('data-x'),
                y: field.getAttribute('data-y')
            };
        });

        fetch('/admin/save-mapping', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ mapping: mapping })
        })
        .then(response => response.json())
        .then(data => alert('Mapping saved!'))
        .catch(error => console.error('Error:', error));
    }
</script>
