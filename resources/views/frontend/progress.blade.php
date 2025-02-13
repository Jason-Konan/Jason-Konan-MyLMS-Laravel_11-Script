<x-default-layout>
    <div>
        Progression : {{ $completedLessons }} / {{ $totalLessons }} ({{ $progressPercentage }}%)
    </div>
    <div style="width: 100%; background-color: #f3f3f3;">
        <div style="width: {{ $progressPercentage }}%; background-color: #4caf50; height: 20px;">
        </div>
    </div>
</x-default-layout>
