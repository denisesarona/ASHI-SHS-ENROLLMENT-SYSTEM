<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learner Map</title>
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
    @vite('resources/css/app.css') <!-- or use <link> to Tailwind CDN if not using Vite -->
</head>
<body class="bg-gray-100">

    <div class="relative w-full max-w-5xl mx-auto mt-10 border border-gray-300">
        <img src="{{ $imagePath }}" class="w-full object-contain" alt="Map">

        @foreach ($learners as $learner)
            <div class="absolute cursor-move z-10"
                style="top: {{ $learner->top_position ?? 0 }}px; left: {{ $learner->left_position ?? 0 }}px;"
                data-id="{{ $learner->id }}"
                data-x="0" data-y="0">

                <input type="text"
                    class="bg-white text-xs px-1 py-0.5 border border-gray-300 rounded shadow-sm w-40"
                    value="{{ $learner->display_address ?? $learner->baranggay . ', ' . $learner->municipality }}"
                    oninput="this.setAttribute('data-changed', 'true')"
                />
            </div>
        @endforeach
    </div>

    <script>
        interact('.cursor-move').draggable({
            modifiers: [
                interact.modifiers.restrictRect({
                    restriction: 'parent',
                    endOnly: true
                })
            ],
            onmove(event) {
                const target = event.target;
                const x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                const y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

                target.style.transform = `translate(${x}px, ${y}px)`;
                target.setAttribute('data-x', x);
                target.setAttribute('data-y', y);
            },
            onend(event) {
                const target = event.target;
                const id = target.getAttribute('data-id');
                const rect = target.getBoundingClientRect();
                const parentRect = target.parentElement.getBoundingClientRect();

                const newLeft = rect.left - parentRect.left;
                const newTop = rect.top - parentRect.top;

                const input = target.querySelector('input');
                const address = input.value;

                fetch('/learner-map/update-position', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        id: id,
                        left: newLeft,
                        top: newTop,
                        address: address
                    })
                }).then(response => response.json())
                  .then(data => console.log(data));
            }
        });
    </script>

</body>
</html>
