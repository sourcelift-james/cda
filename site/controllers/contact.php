<?php

return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

        $data = [
            'name'  => get('name'),
            'email' => get('email'),
            'help'  => get('help')
        ];

        $rules = [
            'name'  => ['required', 'min' => 3],
            'email' => ['required', 'email'],
            'help'  => ['required', 'min' => 3, 'max' => 3000],
        ];

        $messages = [
            'name'  => 'Please enter a valid name',
            'email' => 'Please enter a valid email address',
            'help'  => 'Please describe how we can help you.'
        ];

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

        // the data is fine, let's send the email
        } else {
            try {
                $kirby->email([
                    'template' => 'email',
                    'from'     => $page->formRecipient()->toString(),
                    'replyTo'  => $data['email'],
                    'to'       => $page->formRecipient()->toString(),
                    'subject'  => esc($data['name']) . ' submitted your CDA contact form.',
                    'data'     => [
                        'text'   => esc($data['help']),
                        'sender' => esc($data['name'])
                    ]
                ]);

            } catch (Exception $error) {
                var_dump($error);
                $alert['error'] = "The form could not be sent";
            }

            // no exception occured, let's send a success message
            if (empty($alert) === true) {
                $success = 'Your message has been sent, thank you. We will get back to you soon!';
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false
    ];
};
