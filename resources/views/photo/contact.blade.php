@extends('layouts.mainLayout')

@section('content')

    <main class="blog">
        <div class="contact_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('photo.send')}}" method="post" class="mail_section">
                            @csrf
                            @method('post')
                            <h1 class="contact_taital">Contact us</h1>
                            <input type="text" class="email_text" placeholder="Name" name="name">
                            <input type="text" class="email_text" placeholder="Phone" name="phone">
                            <input type="text" class="email_text" placeholder="Email" name="email">
                            <textarea class="massage_text" placeholder="Message" rows="5" id="comment" name="message"></textarea>
                            <button type="submit" class="border-0 bg-transparent m-2">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
