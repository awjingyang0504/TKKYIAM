{{--flash message--}}
        @if ($flashMessage == true)
        <div>
            @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @elseif (session()->has('message1'))
            <div class="alert alert-danger" role="alert">
                {{ session('message1') }}
            </div> 
            @endif
        </div>
        @endif
<div class="form-check form-switch">

  <input class="form-check-input"  wire:model="isActive" type="checkbox" role="switch" @if($isActive) checked @endif>
</div>
