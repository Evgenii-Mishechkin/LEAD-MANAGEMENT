@component('mail::message')
<table style="width: 100%; background-color: #F3F4F6; padding: 20px;">
    <tr>
        <td style="text-align: center;">
            <h1 style="font-size: 24px; font-weight: bold; color: #1F2937;">
                {{ __('Подтверждение Email Адреса') }}
            </h1>
        </td>
    </tr>
    <tr>
        <td style="text-align: center; padding: 20px 0;">
            <p style="font-size: 16px; color: #4B5563;">
                {{ __('Пожалуйста, нажмите на кнопку ниже, чтобы подтвердить ваш email адрес.') }}
            </p>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <a href="{{ $url }}" style="display: inline-block; padding: 12px 24px; font-size: 16px; color: #FFFFFF; background-color: #3B82F6; border-radius: 5px; text-decoration: none;">
                {{ __('Подтвердить Email') }}
            </a>
        </td>
    </tr>
    <tr>
        <td style="text-align: center; padding: 20px 0;">
            <p style="font-size: 14px; color: #4B5563;">
                {{ __('Если вы не создавали учетную запись, никаких действий не требуется.') }}
            </p>
        </td>
    </tr>
    <tr>
        <td style="text-align: center; padding: 10px 0; border-top: 1px solid #E5E7EB;">
            <p style="font-size: 12px; color: #9CA3AF;">
                {{ __('С уважением, команда ') }} {{ config('app.name') }}
            </p>
        </td>
    </tr>
</table>
@endcomponent
