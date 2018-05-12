Hi {{ $name }}, please reset your password by click the link below
<br />
<br />
@if ($type == "member")
  {{ route('member.password.reset') }}?email={{$email}}&token={{ $token }}
@else
  {{ route('company.password.reset') }}?email={{$email}}&token={{ $token }}
@endif
<br />
<br />
- Wngine Team
