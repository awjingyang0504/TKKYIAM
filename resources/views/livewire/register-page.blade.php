<div>
@include('layouts.partials.dashboardnavbar')

    @if($redirect == 'register')
    @livewire('register-competition')

    @else
    @livewire('update-competition',['participant' => $participant])
    @endif
</div>