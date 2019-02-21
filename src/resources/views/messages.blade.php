@if (session('status'))
	<div class="modal-wrapper success">
		<div class="modal-alert">
			<a href="#" class="close-button">cerrar</a>
			<h2>{{ session('statusTitle') }}</h2>
			<p>{{ session('status') }}</p>
		</div>
	</div>
@endif

@if (count($errors) > 0)
	<div class="modal-wrapper error">
		<div class="modal-alert">
			<a href="#" class="close-button">cerrar</a>
			<h2>¡Error en los datos!</h2>
			<p>@foreach ($errors->all() as $error) {{ $error }}<br/> @endforeach</p>
		</div>
	</div>
@endif

@if (session('error'))
	<div class="modal-wrapper error">
		<div class="modal-alert">
			<a href="#" class="close-button">cerrar</a>
			<h2>{{ session('errorTitle') }}</h2>
			<p>{{ session('error') }}</p>
		</div>
	</div>
@endif

@section('scripts')
@parent

<script>
	$(function() {
		$('.modal-alert .close-button').click(function(e) {
			e.preventDefault();
			$(this).parent().parent().hide('fade');
			if ($(this).parent().parent().hasClass('error')) {
				topOffset = $('form').offset().top - $('.header-wrapper').outerHeight();
				$('html, body').animate({ scrollTop: topOffset - 40 }, 1000);
			}
		});

		@if (count($errors) > 0 || session('error'))
			$('.modal-wrapper.error').show('fade');
		@endif

		@if (session('status'))
			$('.modal-wrapper.success').show('fade');
		@endif
	});
</script>

@endsection
