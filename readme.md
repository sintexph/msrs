## MSRS

### Mail Sending Usage
**Code snippets**

Notify completions approver
```php
App\Helpers\MailSendingHelper::approval_completion_bem(ServiceRequest::find(5));
App\Helpers\MailSendingHelper::approval_completion_dept(ServiceRequest::find(5));
```

Notify outsource approver
```php
App\Helpers\MailSendingHelper::approval_outsource_factory(ServiceRequest::find(5));
App\Helpers\MailSendingHelper::approval_outsource_project(ServiceRequest::find(5));
App\Helpers\MailSendingHelper::approval_outsource_regional(ServiceRequest::find(5));
```

Notify request approver
```php
App\Helpers\MailSendingHelper::approval_request_bem(ServiceRequest::find(5));
App\Helpers\MailSendingHelper::approval_request_dept(ServiceRequest::find(5));
App\Helpers\MailSendingHelper::approval_request_ehss(ServiceRequest::find(5));
App\Helpers\MailSendingHelper::approval_request_factory(ServiceRequest::find(5));
App\Helpers\MailSendingHelper::approval_request_project(ServiceRequest::find(5));
```


Notify user for approved and rejection of request
```php
App\Helpers\MailSendingHelper::sendRequestApproved(User::inRandomOrder()->first(),ServiceRequest::find(5));
App\Helpers\MailSendingHelper::sendRequestDenied(User::inRandomOrder()->first(),ServiceRequest::find(5));
```

Notify user for approved and rejection of outsource
```php
App\Helpers\MailSendingHelper::sendOutsourceApproved(User::inRandomOrder()->first(),ServiceRequest::find(5));
App\Helpers\MailSendingHelper::sendOutsourceDenied(User::inRandomOrder()->first(),ServiceRequest::find(5));
```

Notify user for approved and rejection of completions
```php
App\Helpers\MailSendingHelper::sendCompletionsApproved(User::inRandomOrder()->first(),ServiceRequest::find(5));
App\Helpers\MailSendingHelper::sendCompletionsDenied(User::inRandomOrder()->first(),ServiceRequest::find(5));
```