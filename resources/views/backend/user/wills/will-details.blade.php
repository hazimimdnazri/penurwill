@extends('backend.layouts.main')

@section('prescript')
<link rel="stylesheet" href="{{ asset('assets/backend/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
@endsection

@section('content')
	<nav class="page-breadcrumb">
		<ol class="breadcrumb align-items-center">
			<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home fs-4"></i></a></li>
			<li class="breadcrumb-item active" aria-current="page">My Will</li>
		</ol>
	</nav>

    <div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body border-1 border">
					<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link {{ isset($_GET['tab']) ? ($_GET['tab'] == 'personal' ? 'active' : NULL) : 'active' }}" href="?tab=personal" aria-selected="true">Personal</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ isset($_GET['tab']) ? ($_GET['tab'] == 'financial' ? 'active' : NULL) : NULL }}" href="?tab=financial" aria-selected="false">Financial</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ isset($_GET['tab']) ? ($_GET['tab'] == 'property' ? 'active' : NULL) : NULL }}" href="?tab=property" aria-selected="false">Property</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ isset($_GET['tab']) ? ($_GET['tab'] == 'dnl' ? 'active' : NULL) : NULL }}" href="?tab=dnl" aria-selected="false">Debts & Liabilities</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ isset($_GET['tab']) ? ($_GET['tab'] == 'benefits' ? 'active' : NULL) : NULL }}" href="?tab=benefits" aria-selected="false">Future Benefits</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ isset($_GET['tab']) ? ($_GET['tab'] == 'testament' ? 'active' : NULL) : NULL }}" href="?tab=testament" aria-selected="false">Last Testament</a>
						</li>

						<li class="nav-item">
							<a class="nav-link {{ isset($_GET['tab']) ? ($_GET['tab'] == 'witness' ? 'active' : NULL) : NULL }}" href="?tab=witness" aria-selected="false">Executor & Witness</a>
						</li>
					</ul>
					<div class="tab-content border rounded border-top-0 p-3" id="myTabContent">
						<div id="variable"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('postscript')
<script src="{{ asset('assets/backend/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
<script>
    $(() => {
		$("#mn-will").addClass('active')

        @if(isset($_GET['tab']))
        loadTab("{{ $_GET['tab'] }}");
        @else
        loadTab("personal");
        @endif
    })

    loadTab = (tab) => {
        runLoader('load')
        
        $.ajax({
            type:"POST",
            url: "{{ url('client/my-will/ajax/load-tab') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'tab': tab,
                'will_id': "{{ request()->id }}"
            }
        }).done((response) => {
            $("#variable").html(response)
            closeLoader()
        });
    }
</script>
@endsection