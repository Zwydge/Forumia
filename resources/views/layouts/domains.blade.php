@foreach($domains as $domain)
    <div class="domain_btn" enable="disable" domain-id="{{ $domain['label'] }}">{{ $domain['label'] }}</div>
@endforeach
