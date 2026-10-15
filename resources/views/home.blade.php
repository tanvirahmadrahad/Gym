@extends('layouts.app')

@section('content')
    <!-- 1. Hero Section (With Dynamic Auto-Slider) -->
    @include('components.hero')

    <!-- 2. About Us Section -->
    @include('components.about')

    <!-- 3. Why Choose Us? -->
    @include('components.why-choose-us')

    <!-- 4. Programs That Deliver Real Results -->
    @include('components.programs')

    <!-- 5. Our Class Schedule (Timetable & Category Filter) -->
    @include('components.schedule')

    <!-- 6. Achievements / Stats Counter (160+, 2000+, 92+) -->
    @include('components.stats')

    <!-- 7. Our Pricing Plans (Monthly / Yearly Toggle) -->
    @include('components.pricing')

    <!-- 8. Member Transformations (Julian Wood Case Study) -->
    @include('components.transformations')

    <!-- 9. Our Gallery (Bento Fitness Grid) -->
    @include('components.gallery')

    <!-- 10. Certified Trainers & Coaches -->
    @include('components.trainers')

    <!-- 11. Explore Our Insights (Blog & Workout Tips) -->
    @include('components.blog')
@endsection
