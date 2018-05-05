Hi {{ $name }}, thankyou for your registration, please confirm your registration by click the link below
<br />
<br />
  @if ($type == "member")
    {{ route('member.confirmation') }}?token={{ $token }}
  @else
    {{ route('company.confirmation') }}?token={{ $token }}
  @endif
<br />
<br />
- Wngine Team
