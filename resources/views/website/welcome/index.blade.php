@extends('layouts.app')

@section('content')

    <!-- Section Home -->
    @include('website.welcome.sections.home')

    <!-- Section popular categories -->
    @include('website.welcome.sections.popular-categories')

    <!-- Section Create an account -->
{{--    @include('website.welcome.sections.create-an-account')--}}

    <!-- Section Featured Jobs -->
    @include('website.welcome.sections.featured-jobs')

    <!-- Section Testimonials -->
    {{--@include('website.welcome.sections.testimonials')--}}

    <!-- Section Featured Companies -->
{{--    @include('website.welcome.sections.featured-companies')--}}

    <!-- Section Career tips -->
    {{--@include('website.welcome.sections.career-tips')--}}

    <!-- Section FAQ -->
    {{--@include('website.welcome.sections.faq')--}}

    <!-- Footer -->
    @include('layouts.components.footer')

    <div class="container">
    </div>
@endsection