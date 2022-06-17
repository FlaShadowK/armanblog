<x-contact>

    @section('content')

{{--        <form id="contactForm" data-sb-form-api-token="API_TOKEN">--}}
        <form id="contactForm" method="post" action="{{route('contact-mail')}}">
            @csrf
            <div class="form-floating">
                <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                <label for="name">Ime</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
            </div>
            <div class="form-floating">
                <input class="form-control" name="email" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                <label for="email">Email addresa</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
            </div>
            <div class="form-floating">
                <input class="form-control" name="phone" id="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                <label for="phone">Broj telefona</label>
                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="messages" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                <label for="message">Poruka</label>
                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
            </div>
            <br />
{{--            <button class="btn btn-primary" >Send</button>--}}
            <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
        </form>

    @endsection
</x-contact>
