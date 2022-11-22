<script type="text/javascript">
    window.onload=function(){
        var auto = setTimeout(function(){ autoRefresh(); }, 100);

        function submitform(){
          document.forms["myForm"].submit();
        }

        function autoRefresh(){
           clearTimeout(auto);
           auto = setTimeout(function(){ submitform(); autoRefresh(); }, 1000);
        }
    }
</script>

<p>Buscando la habitacion perfecta para ti....</p>


<form name="myForm" id="myForm" method="POST" action="{{ route('buscador.store') }}">
    @csrf
    <div class="check-date">
        <input type="date" id="inicio" name="inicio" value="{{ $inicio }}" hidden>
        <i class="icon_calendar"></i>
    </div>
    <div class="check-date">
        <input type="date" id="fin" name="fin" value="{{ $fin }}" hidden>
        <i class="icon_calendar"></i>
    </div>
    <div class="select-option">
        <input type="number" name="personas" value="{{ $personas }}" hidden>
    </div>
</form>