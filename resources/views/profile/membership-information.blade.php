@php
    $user = App\Models\User::where('id', Auth::id())->first();
    $userMemberships = $user->memberships;
@endphp
<x-action-section>
    <x-slot name="title">
        {{ __('Información sobre tu membresia') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Adminstra tu membresia y mantente al tanto de tu proxima renovación.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-base font-medium text-gray-900 dark:text-gray-100">
            Membresia actual: <span class="max-w-xl text-base text-gray-600 dark:text-gray-400">{{$userMemberships[0]['type'] }} - {{$userMemberships[0]['plan']}}</span> 
        </h3>
        <h3 class="mt-2 text-base font-medium text-gray-900 dark:text-gray-100">
            Fecha de renovación: <span class="max-w-xl text-base text-gray-600 dark:text-gray-400">{{\Carbon\Carbon::parse($userMemberships[0]->pivot->renew_date)->format('d/m/Y')}}</span>         
        </h3>
        <h3 class="mt-2 text-base font-medium text-gray-900 dark:text-gray-100">
            Fecha de incripción: <span class="max-w-xl text-base text-gray-600 dark:text-gray-400">{{\Carbon\Carbon::parse($userMemberships[0]->pivot->inscription)->format('d/m/Y')}}</span> 
        </h3>
    </x-slot>

</x-action-section>
