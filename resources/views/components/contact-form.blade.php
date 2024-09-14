<div class="contact-form-wrap">
    <div class="contact-form-area">
        <h3>Your Success Starts Here!</h3>
        @if(session('message'))
        <script>
            toastr.success("{{session('message')}}");
        </script>
        @endif
        <form action="{{ url('form-submission') }}/contact-form" method="POST">
            @csrf
            <input type="hidden" name="form_url" value="contact-form">
            <div class="row">
                <div class="col-lg-6 mb-20">
                    <div class="form-inner">
                        <label>Full Name</label>
                        <input type="text" name="full_name">
                    </div>
                </div>
                <div class="col-lg-6 mb-20">
                    <div class="form-inner">
                        <label>Company / Organization *</label>
                        <input type="text" name="company">
                    </div>
                </div>
                <div class="col-lg-6 mb-20">
                    <div class="form-inner">
                        <label>Phone *</label>
                        <input type="text" name="phone">
                    </div>
                </div>
                <div class="col-lg-6 mb-20">
                    <div class="form-inner">
                        <label>Company email *</label>
                        <input type="email" name="email">
                    </div>
                </div>
                <div class="col-lg-12 mb-20">
                    <div class="form-inner">
                        <label>Your Subject *</label>
                        <input type="text" name="subject">
                    </div>
                </div>
                <div class="col-lg-12 mb-30">
                    <div class="form-inner">
                        <label>Message *</label>
                        <textarea name="message"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-inner">
                        <button class="primary-btn2" type="submit" data-text="Submit Now"><span>Submit Now</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>