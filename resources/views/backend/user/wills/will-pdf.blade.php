<style>
    body {
        font-family : "Arial";
        font-size: 10;
    }

    .master {
        page-break-inside: avoid !important;
    }

    .page-break {
        page-break-before: always;
    }
</style>

<div style="text-align: center; width: 100%">
    <p style="margin-bottom: 10px">LAST WILL & TESTAMENT</p>
    <b>{{ auth()->user()->name }}<b> <br>
    <b>{{ auth()->user()->r_details->ic }}</b>
</div>

<div style="text-align: left; width: 100%">
    <p><b><u>IDENTIFICATION</u></b></p>
    This to be my Last Will and Testament, I, <b>{{ auth()->user()->name }}</b> (<b>{{ auth()->user()->r_details->ic }}</b>) of 
    {{ auth()->user()->r_details->address_1 }}, {{ auth()->user()->r_details->address_2 }}, {{ auth()->user()->r_details->address_3 }} in the state of {{ auth()->user()->r_details->r_state->state }}, Malaysia.
</div>

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>REVOCATION</u></b></p>
    <span>I revoke all previous Wills and Testamentary documents made by me.</span>
</div>

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>EXUCUTOR APPOINTMENT</u></b></p>
    <span>I appoint <b>{{ auth()->user()->r_will->r_executors->first()->name }}</b>, <b>({{ auth()->user()->r_will->r_executors->first()->ic }})</b> of 
    {{ auth()->user()->r_will->r_executors->first()->address_1  }}, 
    @if(auth()->user()->r_will->r_executors->first()->address_2) {{ auth()->user()->r_will->r_executors->first()->address_2  }},  @endif
    @if(auth()->user()->r_will->r_executors->first()->address_3) {{ auth()->user()->r_will->r_executors->first()->address_3  }},  @endif
    in the State of {{ strtoupper(auth()->user()->r_will->r_executors->first()->r_state->state) }} , MALAYSIA</span><br>

    @if(auth()->user()->r_will->r_executors->count() > 1)
    @foreach(auth()->user()->r_will->r_executors->skip(1) as $e)
    
    <p style="margin-top: 10px; margin-bottom: 10px">and</p>

    <span><b>{{ $e->name }}</b>, <b>({{ $e->ic }})</b> of 
    {{ $e->address_1  }}, 
    @if($e->address_2) {{ $e->address_2  }},  @endif
    @if($e->address_3) {{ $e->address_3  }},  @endif
    in the State of {{ strtoupper($e->r_state->state) }}, MALAYSIA</span><br>
    @endforeach
    <br>
    <span>to be the Executor(s) of this my Will and Trustee(s) of my Estate.<br>
    @endif
</div>
<br><br>
<p>Signed:</p>
<br><br><br><br>
<div style="width: 100%">
    <table width="100%">
        <tr>
            <td style="text-align: left">
                ___________________________<br><br>
                Will Maker<br>
                <p style="margin-bottom: 0; font-weight: bold">{{ auth()->user()->name }}</p>
                <p style="margin-top: 0; font-weight: bold">{{ auth()->user()->r_details->ic }}</p>
            </td>
            <td style="text-align: left">
                ___________________________<br><br>
                Witness
                <p style="margin-bottom: 0; font-weight: bold">{{ auth()->user()->r_will->r_witnesses->first()->name }}</p>
                <p style="margin-top: 0; font-weight: bold">{{ auth()->user()->r_will->r_witnesses->first()->ic }}</p>
            </td>
            <td style="text-align: left">
                ___________________________<br><br>
                Witness
                <p style="margin-bottom: 0; font-weight: bold">{{ auth()->user()->r_will->r_witnesses->skip(1)->first()->name }}</p>
                <p style="margin-top: 0; font-weight: bold">{{ auth()->user()->r_will->r_witnesses->skip(1)->first()->ic }}</p>
            </td>
        </tr>
    </table>
</div>


<div class="page-break"></div>


<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>REAL ESTATE</u></b></p>
    <p style="margin-bottom: 0px">I hereby leave the: </p>
    <br>
    @foreach(auth()->user()->r_will->r_estates as $e)
        {{ $e->getType() }}, 
        @if($e->address_1) {{ $e->address_1 }}, @endif
        @if($e->address_2) {{ $e->address_2 }}, @endif
        @if($e->address_3) {{ $e->address_3 }}, @endif
        @if($e->city) {{ $e->city }}, @endif
        @if($e->zipcode) {{ $e->zipcode }}, @endif
        @if($e->state_id) {{ strtoupper($e->r_state->state) }}, @endif
        @if($e->size) {{ strtoupper($e->size) }} (sqft), @endif
        <p>to</p>
        @foreach(json_decode($e->beneficiaries, true) as $k => $v)
            <p>
                {{ \App\Models\WillBeneficiary::findorfail($k)->name }}, {{ \App\Models\WillBeneficiary::findorfail($k)->ic }} of 
                @if(\App\Models\WillBeneficiary::findorfail($k)->address_1) <b> {{ \App\Models\WillBeneficiary::findorfail($k)->address_1 }} </b>, @endif
                @if(\App\Models\WillBeneficiary::findorfail($k)->address_2) <b> {{ \App\Models\WillBeneficiary::findorfail($k)->address_2 }} </b>, @endif
                @if(\App\Models\WillBeneficiary::findorfail($k)->address_3) <b> {{ \App\Models\WillBeneficiary::findorfail($k)->address_3 }} </b>, @endif
                in the State of {{ strtoupper(\App\Models\WillBeneficiary::findorfail($k)->r_state->state) }}, MALAYSIA.
            </p>
        @endforeach
    @endforeach
    <p>If this person predeceases me or dies within 30 days of my death then I leave the whole of my estate free of all costs</p>
    <p>If any of my children predeceases me then the share they would have received  I give to their surviving children if any, in equal shares.</p>
</div>

<br><br>
<p>Signed:</p>
<br><br><br><br>
<div style="width: 100%">
    <table width="100%">
        <tr>
            <td style="text-align: left">
                ___________________________<br><br>
                Will Maker<br>
                <p style="margin-bottom: 0; font-weight: bold">{{ auth()->user()->name }}</p>
                <p style="margin-top: 0; font-weight: bold">{{ auth()->user()->r_details->ic }}</p>
            </td>
            <td style="text-align: left">
                ___________________________<br><br>
                Witness
                <p style="margin-bottom: 0; font-weight: bold">{{ auth()->user()->r_will->r_witnesses->first()->name }}</p>
                <p style="margin-top: 0; font-weight: bold">{{ auth()->user()->r_will->r_witnesses->first()->ic }}</p>
            </td>
            <td style="text-align: left">
                ___________________________<br><br>
                Witness
                <p style="margin-bottom: 0; font-weight: bold">{{ auth()->user()->r_will->r_witnesses->skip(1)->first()->name }}</p>
                <p style="margin-top: 0; font-weight: bold">{{ auth()->user()->r_will->r_witnesses->skip(1)->first()->ic }}</p>
            </td>
        </tr>
    </table>
</div>