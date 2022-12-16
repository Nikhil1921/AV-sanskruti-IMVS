<?php defined('BASEPATH') OR exit('No direct script access allowed');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Home extends MY_Controller {
	
	public function index()
	{
		$data['title'] = 'Home';
        $data['name'] = 'home';

		return $this->template->load('template', 'home', $data);
	}

	public function register()
	{
		check_ajax();

		$this->load->library('form_validation');

		$this->form_validation->set_rules($this->register);
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run() == FALSE)
			$response = [
                    'message' => validation_errors(),
                    'status' => false
                ];
		else{
			switch ($this->input->post('payment-method')) {
                case "Razorpay":
                    $response = $this->saveOrder();
					break;
                default:
					$api = new Api(RAZOR_KEY, RAZOR_SECRET);
					$exam = ['id' => d_id($this->input->post('exams'))];
                    $amount = $this->main->check('category', $exam, 'price');

                    $orderData = [
                        'receipt'   => 'Av_sanskruti_imvs_'.time().rand(100, 999),
                        'amount'    => $amount * 100, // Grand total in paise
                        'currency'  => 'INR'
                    ];

                    $order = $api->order->create($orderData);

                    if(isset($order->id))
                        $response = ['status' => true, 'amount' => $orderData['amount'], 'order_id' => $order->id];
                    else
                        $response = ['status' => false, 'message' => "Some error occured."];
                    break;
            }
		}
		
		die(json_encode($response));
	}

	private function saveOrder()
    {
		$this->verifyOrder();

        return $this->main->register();
    }

	private function verifyOrder()
    {
		$payment = [
            'razorpay_order_id'   => $this->input->post('order_id'),
            'razorpay_payment_id' => $this->input->post('payment_id'),
            'razorpay_signature'  => $this->input->post('signature')
        ];

        $api = new Api(RAZOR_KEY, RAZOR_SECRET);

        try {
            $api->utility->verifyPaymentSignature($payment);
            return true;
        } catch(SignatureVerificationError $e) {
            die(json_encode(['error' => true, 'message' => 'Invalid payment.']));
        }
    }

    // public function checkemail($send, $check=0)
    // {
    //     $subject = 'Registration details';
    //     $message = $this->load->view('partials/'.$send, [], true);

    //     if($check) send_email('densetek.nishant@gmail.com', $message, $subject);
    //     else echo $message;
    // }

	protected $register = [
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|max_length[100]|is_unique[register.email]|valid_email',
            'errors' => [
                'required' => "%s is Required",
                'max_length' => "Max 100 chars allowed",
                'is_unique' => "%s is already registered",
                'valid_email' => "%s is not valid"
            ]
		],
        [
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => "%s is Required",
                'max_length' => "Max 255 chars allowed",
            ]
		],
		[
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'required|exact_length[10]|is_unique[register.mobile]',
            'errors' => [
                'required' => "%s is Required",
                'is_unique' => "%s is already registered",
                'exact_length' => "%s is not valid"
            ]
		],
		[
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
		],
		[
            'field' => 'exams',
            'label' => 'Exam Exam Category',
            'rules' => 'required|is_natural',
            'errors' => [
                'required' => "%s is Required",
                'is_natural' => "%s is not valid"
            ]
		],
		[
			'field' => 'exam_date',
            'label' => 'Exam Paper Date',
            'rules' => 'required|is_natural',
            'errors' => [
				'required' => "%s is Required",
                'is_natural' => "%s is not valid"
				]
		],
		[
			'field' => 'exam_lang',
			'label' => 'Exam Language',
			'rules' => 'required|is_natural',
			'errors' => [
				'required' => "%s is Required",
				'is_natural' => "%s is not valid"
			]
		],
		[
			'field' => 'country',
			'label' => 'Country',
			'rules' => 'required|is_natural',
			'errors' => [
				'required' => "%s is Required",
				'is_natural' => "%s is not valid"
			]
		],
		[
			'field' => 'state',
			'label' => 'State',
			'rules' => 'required|is_natural',
			'errors' => [
				'required' => "%s is Required",
				'is_natural' => "%s is not valid"
			]
		],
		[
			'field' => 'city',
			'label' => 'City',
			'rules' => 'required|is_natural',
			'errors' => [
				'required' => "%s is Required",
				'is_natural' => "%s is not valid"
			]
		]
    ];
}