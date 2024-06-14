<style>
    body {
        font-family : "Arial";
        font-size: 9.8;
        margin-bottom: 130px;
    }

    .master {
        page-break-inside: avoid !important;
    }

    .page-break {
        page-break-before: always;
    }

    #sign {
        position: fixed; 
        bottom: -40px;
        left: 0cm;
        right: 0cm;
        /** Extra personal styles **/
        z-index: 10;
        padding: 0 0;
        padding-bottom: 0;
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

<div id="sign" style="width: 100%">
    <p>Signed:</p>
    <br><br>
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

<div class="page-break"></div>

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>INVESTMENT</u></b></p>
    <p style="margin-bottom: 0px">I hereby leave the: </p>
    <br>
    @foreach(auth()->user()->r_will->r_investments as $i)
        {{ $i->getType() }}, {{ $i->investment }}
        <p>to</p>
        @foreach(json_decode($i->beneficiaries, true) as $k => $v)
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

<div class="page-break"></div>

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>DEBTS & LIABILITIES</u></b></p>
    <p style="margin-bottom: 0px">I hereby leave the: </p>
    <br>
    @foreach(auth()->user()->r_will->r_debts as $d)
        Debt (<b>{{ $d->name }}</b>) with the amount of <b>RM {{ number_format($d->amount, 2) }}</b>
        <p>to</p>
        @foreach(json_decode($d->beneficiaries, true) as $k => $v)
            <p>
                {{ \App\Models\WillBeneficiary::findorfail($k)->name }}, {{ \App\Models\WillBeneficiary::findorfail($k)->ic }} of 
                @if(\App\Models\WillBeneficiary::findorfail($k)->address_1) <b> {{ \App\Models\WillBeneficiary::findorfail($k)->address_1 }} </b>, @endif
                @if(\App\Models\WillBeneficiary::findorfail($k)->address_2) <b> {{ \App\Models\WillBeneficiary::findorfail($k)->address_2 }} </b>, @endif
                @if(\App\Models\WillBeneficiary::findorfail($k)->address_3) <b> {{ \App\Models\WillBeneficiary::findorfail($k)->address_3 }} </b>, @endif
                in the State of {{ strtoupper(\App\Models\WillBeneficiary::findorfail($k)->r_state->state) }}, MALAYSIA.
            </p>
        @endforeach
    @endforeach
</div>

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>BANK ACCOUNT</u></b></p>
    <p style="margin-bottom: 0px">I hereby leave the: </p>
    <br>
    @foreach(auth()->user()->r_will->r_banks as $b)
        <b>{{ $b->r_bank->bank }}</b>, @if($b->branch) {{ $b->branch}} branch @endif with the amount of <b>RM {{ number_format($b->amount, 2) }}</b>
        <p>to</p>
        @foreach(json_decode($b->beneficiaries, true) as $k => $v)
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

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>PERSONAL PROPERTY</u></b></p>
    <p style="margin-bottom: 0px">I hereby leave the: </p>
    <br>
    @foreach(auth()->user()->r_will->r_jewelries as $j)
        <b>{{ $j->quantity }} pc(s)</b> of <b>{{ $j->getType() }} @if($j->weight) ({{ $j->weight }} gram) @endif</b>
        <p>to</p>
        @foreach(json_decode($j->beneficiaries, true) as $k => $v)
            <p>
                {{ \App\Models\WillBeneficiary::findorfail($k)->name }}, {{ \App\Models\WillBeneficiary::findorfail($k)->ic }} of 
                @if(\App\Models\WillBeneficiary::findorfail($k)->address_1) <b> {{ \App\Models\WillBeneficiary::findorfail($k)->address_1 }} </b>, @endif
                @if(\App\Models\WillBeneficiary::findorfail($k)->address_2) <b> {{ \App\Models\WillBeneficiary::findorfail($k)->address_2 }} </b>, @endif
                @if(\App\Models\WillBeneficiary::findorfail($k)->address_3) <b> {{ \App\Models\WillBeneficiary::findorfail($k)->address_3 }} </b>, @endif
                in the State of {{ strtoupper(\App\Models\WillBeneficiary::findorfail($k)->r_state->state) }}, MALAYSIA.
            </p>
        @endforeach
    @endforeach
    @foreach(auth()->user()->r_will->r_others as $o)
        <b>{{ $j->getType() }}</b>
        <p>to</p>
        @foreach(json_decode($o->beneficiaries, true) as $k => $v)
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

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>INSURANCE</u></b></p>
    <p style="margin-bottom: 0px">I hereby leave the: </p>
    <br>
    @foreach(auth()->user()->r_will->r_insurances as $i)
        <b>{{ $i->getType() }}</b> - <b>({{ $i->insurance }})</b> provided by <b>{{ $i->provider }}</b>
        <p>to</p>
        @foreach(json_decode($i->beneficiaries, true) as $k => $v)
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

<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>BUSINESS INTEREST</u></b></p>
    <p style="margin-bottom: 0px">I hereby leave the: </p>
    <br>
    @foreach(auth()->user()->r_will->r_businesses as $b)
        <b>{{ $b->name }}</b>
        <p>to</p>
        @foreach(json_decode($b->beneficiaries, true) as $k => $v)
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

@if(auth()->user()->r_will->r_digitals->isNotEmpty())
<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>DIGITAL ASSETS</u></b></p>
    <p style="margin-bottom: 0px">I hereby leave the: </p>
    <br>
    @foreach(auth()->user()->r_will->r_digitals as $d)
        <b>{{ $b->getType() }}</b>
        <p>to</p>
        @foreach(json_decode($d->beneficiaries, true) as $k => $v)
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
@endif

@if(auth()->user()->r_will->r_benefits->isNotEmpty())
<div style="text-align: left; width: 100%; margin-top: 10px">
    <p><b><u>FUTURE BENEFITS</u></b></p>
    <p style="margin-bottom: 0px">I hereby leave the: </p>
    <br>
    <b>Future Benefits</b>
    <p>to</p>
    @foreach(auth()->user()->r_will->r_benefits as $b)
        <p>
            {{ \App\Models\WillBeneficiary::findorfail($b->beneficiary_id)->name }}, {{ \App\Models\WillBeneficiary::findorfail($b->beneficiary_id)->ic }} of 
            @if(\App\Models\WillBeneficiary::findorfail($b->beneficiary_id)->address_1) <b> {{ \App\Models\WillBeneficiary::findorfail($b->beneficiary_id)->address_1 }} </b>, @endif
            @if(\App\Models\WillBeneficiary::findorfail($b->beneficiary_id)->address_2) <b> {{ \App\Models\WillBeneficiary::findorfail($b->beneficiary_id)->address_2 }} </b>, @endif
            @if(\App\Models\WillBeneficiary::findorfail($b->beneficiary_id)->address_3) <b> {{ \App\Models\WillBeneficiary::findorfail($b->beneficiary_id)->address_3 }} </b>, @endif
            in the State of {{ strtoupper(\App\Models\WillBeneficiary::findorfail($b->beneficiary_id)->r_state->state) }}, MALAYSIA.
        </p>
    @endforeach
    <p>If this person predeceases me or dies within 30 days of my death then I leave the whole of my estate free of all costs</p>
    <p>If any of my children predeceases me then the share they would have received  I give to their surviving children if any, in equal shares.</p>
</div>
@endif