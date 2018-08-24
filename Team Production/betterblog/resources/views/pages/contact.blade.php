@extends('layout.base')
@section('title', "Contact Us | Better Blog")
@section('content')
    <section class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                {{--Contact Form--}}
                @component('components.card')
                    @slot('cardTitle')
                        Contact Form
                    @endslot
                    @slot('cardBody')
                        <form method="post" action="">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-form-label-sm mb-0" for="contactEmail">Email: </label>
                                    <input type="email" class="form-control" id="contactEmail" name="contactEmail" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label-sm mb-0"  for="contactUsername">Username <small>(optional)</small>: </label>
                                    <input type="text" class="form-control" id="contactUsername" name="contactUsername">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label-sm mb-0"  for="contactType">Inquiry Type: </label>
                                    <select class="form-control" id="contactType" name="contactType" required>
                                        <option value="">Choose One...</option>
                                        <option value="Option 1">Careers</option>
                                        <option value="Option 2">User Support</option>
                                        <option value="Option 3">Bug/Suggestion</option>
                                        <option value="Option 4">Business Inquiry</option>
                                        <option value="Option 5">Advertisement Inquiry</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label-sm mb-0" for="contactSubject">Subject: </label>
                                <textarea class="form-control" name="contactSubject" id="contactSubject" rows="5" placeholder="Reason for contacting us..." required></textarea>
                            </div>

                            <button type="button" class="btn btn-success">Send Email</button>
                        </form>
                    @endslot
                @endcomponent
            </div>
        </div>
    </section>
@endsection