<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace App\Http\Controllers\Auth;

use Anonym\Components\Database\Exceptions\QueryException;
use Anonym\Components\Mail\DriverInterface;
use Anonym\Components\Route\Controller;
use Anonym\Components\Crypt\SecurityKeyGenerator;
use Anonym\Facades\Mail;
use Anonym\Facades\Config;
use Anonym\Facades\Crypt;
use Anonym\Facades\Element;
use Anonym\Facades\Login;
use Anonym\Facades\Register;
use Anonym\Facades\Request;
use Anonym\Support\Str;
use Anonym\Support\TemplateGenerator;
use OAuthException;
/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller
{

    /**
     * create a new user
     *
     * @param array $data
     * @return mixed
     */
    protected function create($data){

        $results = [];

        array_walk($data, function($key, $value) use(&$results){

            $login = Config::get('database.tables.login');
            $table = $login[1];

            if($key === $table){

                $value = Crypt::encode($value);
            }
            $results[] = [$key,$value];
        });

        return Register::register($results);
    }


    /**
     * login a user with username and password
     *
     * @param string $username
     * @param string $password
     * @param bool|false $remember
     * @return mixed
     */
    protected function entry($username, $password, $remember = false){
        return Login::login($username, Crypt::encode($password), $remember);
    }

    protected function forgetSendMail(array $parameters = [])
    {
        $username = isset($parameters['username']) ? $parameters['username']: '';
        $mailDriver = isset($parameters['mail_driver']) ? $parameters['mail_driver'] : 'default';
        $callback = isset($parameters['callback']) ? $parameters['callback'] : 'auth/forget';

        $table = Config::get('database.tables.table');

        $database = Element::table($table);
        $userColumn = first(Config::get('database.tables.login'));


        $userInformation = $database->select(['email', 'id'])->where($userColumn, $username);

        if(!$userInformation->rowCount()){
            throw new OAuthException(sprintf('%s Username is not exists', $username));
        }

        $datas = $userInformation->fetch();

        // we will find user email now
        $mailAddress = $datas->email;

        $generator = new SecurityKeyGenerator();
        $key = $generator->random($username.$mailAddress);

        $forgets = Element::table('forgets');
        $add = $forgets->set([
            'key' => $key,
            'user_id' => $datas->id
        ])->insert();

        if (!$add) {
            throw new QueryException('Forget keys and user_id could not added to database, please try agein later');
        }

        $url = Request::getBaseWithoutQuery();

        if(!Str::endsWith($callback, "/")){
            $callback .= "/";
        }

        $url .= $callback.$key;

        $template = new TemplateGenerator(file_get_contents(RESOURCE.'migrations/forget_mail.php.dist'));
        $content = $template->generate([
            'url' => $url,
            'username' => $username
        ]);

        $yourAddress = config('mail.your_address');
        Mail::send($mailDriver, function(DriverInterface $mail) use($mailAddress, $username, $content, $yourAddress){
            return $mail->from($yourAddress, '')
                ->subject('Password Recovery')
                ->to($mailAddress, $username)
                ->body($content)
                ->send();
        });


    }
}
