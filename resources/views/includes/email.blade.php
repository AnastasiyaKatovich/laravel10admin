<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-sm-12 col-12 m-auto">
            <form action="{{asset('send-email')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card shadow">

                    @if(Session::has("success"))
                        <div class="alert alert-success alert-dismissible">{{Session::get('success')}}</div>
                    @elseif(Session::has("failed"))
                        <div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('failed')}}</div>
                    @endif

                    <div class="card-header">
                        <h4 class="card-title">
                            Send email</h4>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="emailName">Enter your name</label>
                            <input type="text" name="emailName" id="emailName" class="form-control" placeholder="Name" required>
                        </div>

                         <div class="form-group">
                            <label for="emailEmail">Enter your email</label>
                            <input type="email" name="emailEmail" id="emailEmail" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="emailSubject">Message subject</label>
                            <input type="text" name="emailSubject" id="emailSubject" class="form-control" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="emailBody">Message </label>
                            <textarea name="emailBody" id="emailBody" class="form-control" placeholder="Message"></textarea>
                        </div>

                        {{-- <div class="form-group">
                            <label for="emailAttachments">Attachment(s) </label>
                            <input type="file" name="emailAttachments[]" multiple="multiple" id="emailAttachments" class="form-control">
                        </div> --}}
                    </div>

                    <div class="card-footer">
                        <input type="submit" name="submit" value="Send Email" class="btn btn-primary"/>
                        {{-- <button type="submit" class="btn btn-success">Send Email </button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
