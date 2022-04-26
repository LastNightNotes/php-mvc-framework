<?php 

namespace ramit\phpmvc;
use ramit\phpmvc\db\DbModel;
use ramit\phpmvc\db\Database;

/**
 * Class Application
 * 
 * @package ramit\phpmvc
 */

class Application{
    public static string $ROOT_DIR;
    
    public string $layout = 'main';
    public Router $router;
    public string $userClass;
    public Request $request;
    public Response $response;
    public Session $session;
    public static Application $app;
    public ?Controller $controller = null;
    public Database $db;
    public ?UserModel $user;
    public View $view;
    public function __construct($rootPath, array $config)
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->userClass = $config['userClass'];
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if($primaryValue){
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([
                $primaryKey => $primaryValue
            ]);
        }else{
            $this->user = null;
        }
        
    }

    public function run(){
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderContent('_error', [
                'exception' => $e
            ]);
        }
    }

    public function login(UserModel $user): bool
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest(): bool
    {
       return !self::$app->user;
    }

 
}
