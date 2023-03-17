<?php
    session_start();
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Pages extends Controller
    {
        # Load model
        public function __construct() { $this->pagesModel = $this->model('PagesModel'); }

        # Load views
        public function index() { $this->view('pages/error'); }

        public function login()
        {
            $data = [ 'title' => TITLE ];
            $this->view('pages/login', $data);
        }

        public function forgot()
        {
            $data = [ 'title' => TITLE ];
            $this->view('pages/forgot', $data);
        }
        
        public function signup()
        {
            $data = [ 'title' => TITLE ];
            $this->view('pages/signup', $data);
        }
        
        public function home()
        {
            if (isset($_SESSION['loginEmail']) && isset($_SESSION['loginSuccess']))
            {
                $q = $this->pagesModel->selectUser($_SESSION['loginEmail'], $_SESSION['loginSuccess']);
                $row = mysqli_fetch_assoc($q);

                $data = [
                            'title'     => TITLE,
                            'userEmail' => $row['EMAIL'],
                            'userName'  => $row['NAME'],
                            'userRole'  => $row['USER_ROLE']
                        ];
                $this->view('pages/home', $data);
            }
            else { header('location: ' . PATH_URL . '/pages/login'); }
        }

        public function change()
        {
            $data = [ 'title' => TITLE ];
            $this->view('pages/change', $data);
        }
    }
?>