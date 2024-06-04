<div style="text-align: center; width: 100%">
    <p style="margin-bottom: 10px">LAST WILL & TESTAMENT</p>
    <b>{{ auth()->user()->name }}<b> <br>
    <b>{{ auth()->user()->r_details->ic }}</b>
</div>

<div style="text-align: left; width: 100%">
    <p><b><u>IDENTIFICATION</u></b></p>
    This to be my Last Will and Testament, I, <b>{{ auth()->user()->name }}</b> (<b>{{ auth()->user()->r_details->ic }}</b>) of 
    {{ auth()->user()->r_details->address_1 }}, {{ auth()->user()->r_details->address_2 }}, {{ auth()->user()->r_details->address_3 }} in the state of {{ auth()->user()->r_details->r_state->state }}, Malaysia  
</div>

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>REVOCATION</u></b></p>
    <span>I revoke all previous Wills and Testamentary documents made by me.</span>
</div>

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>EXUCUTOR APPOINTMENT</u></b></p>
    <span>I appoint <b>{{ auth()->user()->r_will->r_executors->first()->name }}</b>, <b>({{ auth()->user()->r_will->r_executors->first()->ic }})</b> 
    of {{ auth()->user()->r_will->r_executors->first()->address_1  }} in the State of {{ auth()->user()->r_will->r_executors->first()->r_state->state }} , Malaysia</span><br>

    @if(auth()->user()->r_will->r_executors->count() > 1)
    <span><b>and</b></span><br>
    @forea()
    <span>[name], ([ic_no]) of [address] in the State of [state], Malaysia</span><br>
    <span>to be the Executor(s) of this my Will and Trustee(s) of my Estate. If he/she/they predecease me of are unable or unwilling to fulfill this role then</span><br>
    <span>I appoint [name], ([ic]) of [address] in the State of [state], Malaysia as Executor and Trustee of my Estate.</span>
    @endif
</div>

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>REAL ESTATE</u></b></p>
    <span>I hereby leave the </span>
</div>