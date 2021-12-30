<div>
    <div>
        @if (Session::get('success'))
            <div class="alert alert-success message">
                <p>{{Session::get('success')}}</p>
            </div>
        @elseif(Session::get('failed'))
            <div class="alert alert-danger message">
                <p>{{Session::get('failed')}}</p>
            </div>
        @elseif(Session::get('status'))
            <div class="alert alert-success message">
                <p>{{Session::get('status')}}</p>
            </div>
        @endif
    </div></div>