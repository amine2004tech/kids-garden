@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1 class="display-4">Contact Us</h1>
            <p class="lead">Get in touch with our team</p>
            <hr class="my-4">
            <p>We'd love to hear from you! Send us a message and we'll get back to you as soon as possible.</p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Contact Information</h5>
                <p class="card-text">
                    <strong>Email:</strong> info@kidslearning.com<br>
                    <strong>Phone:</strong> (123) 456-7890<br>
                    <strong>Address:</strong> 123 Learning Street, Education City
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Send us a Message</h5>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 