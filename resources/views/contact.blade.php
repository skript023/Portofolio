@extends('front_end_helper.default_front_end')
@section('artikel')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Contact Us</h1>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <form action="/contact" method="post">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" cols="30" rows="10" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="add_contact">Send Message</button>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25447306.457171943!2d113.92132701805313!3d-0.7892749886570789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e1!3m2!1sid!2sid!4v1610800322845!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

    </div>
</div>

@endsection