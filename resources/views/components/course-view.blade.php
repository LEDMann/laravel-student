@props(['course'])

@if ($course)
<div>
    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <span>{{ $course->fee }}</span>
</div>
@endif