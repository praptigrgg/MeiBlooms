@extends('frontend.main')

@section('title', 'Contact Us')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Get in Touch 💌</h2>

    <div class="row">
        <div class="col-md-6 mb-4">
            <form method="POST" action="{{ route('frontend.contact.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Send Message</button>
            </form>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

        </div>


        <div class="col-md-6 mb-4">
            <h5 class="mb-3">📍 Our Flower Shop</h5>
            <p><strong>Address:</strong> Ranipauwa, Pokhara-11, Nepal</p>
            <p><strong>Phone:</strong> +977-9763251937</p>
            <p><strong>Email:</strong> hello@meiblooms.com</p>

            <div class="mt-4 rounded overflow-hidden shadow-sm" style="height: 250px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3515.551115896498!2d83.99355487381753!3d28.220947602655094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399595e8e11fcfa9%3A0x4762b23b5eb861ed!2sBakery%20The%20Grg%20Udhyog!5e0!3m2!1sen!2snp!4v1744342676474!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>
    </div>
</div>
@endsection
