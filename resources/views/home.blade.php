@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Kids Learning Platform</h1>
            <p class="lead">A fun and interactive way for kids to learn and grow.</p>
            <hr class="my-4">
            <p>Explore our educational content and start learning today!</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Get Started</a>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Interactive Lessons</h5>
                <p class="card-text">Engaging lessons designed for young learners.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Fun Activities</h5>
                <p class="card-text">Educational games and activities to make learning fun.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Progress Tracking</h5>
                <p class="card-text">Monitor your child's learning progress.</p>
            </div>
        </div>
    </div>
</div>
@endsection
