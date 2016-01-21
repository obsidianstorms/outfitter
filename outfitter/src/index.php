<?php
require __DIR__ . '/../vendor/autoload.php';
define('ROOT_PAGE', '/index.php');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
));

$app->get('/', function () use ($app) {
    return $app->redirect(ROOT_PAGE . '/login');
});

$app->get('/login', function () use ($app) {
//    return 'loginpage';
    return $app['twig']->render('login.html.twig');
});

$app->post('/login', function (Request $request) {
//    $message = $request->get('message');
//    $message = 'sample message';
//    mail('feedback@yoursite.com', '[YourSite] Feedback', $message);
//    mail('flintweather@gmail.com', '[YourSite] Feedback', $message);

    return new Response('Thank you for your feedback!', 201);
});


//$blogPosts = array(
//    1 => array(
//        'date'      => '2011-03-29',
//        'author'    => 'igorw',
//        'title'     => 'Using Silex',
//        'body'      => '...',
//    ),
//);

//$app->get('/', function () use ($blogPosts) {
//    $output = 'Root<br />';
//    return $output;
//});


//be sure to visit domain.abc/index.php/blog -> missing from http://silex.sensiolabs.org/doc/usage.html
//$app->get('/blog', function () use ($blogPosts) {
//    $output = '';
//    foreach ($blogPosts as $post) {
//        $output .= $post['title'];
//        $output .= '<br />';
//    }
//
//    return $output;
//});

//$app->get('/blog/1', function (Silex\Application $app, $id) use ($blogPosts) {
//$app->get('/blog/x', function () {
//$app->get('/blog/1', function ($id) use ($app, $blogPosts) {
//    return  "xval";
//});


//$app->get('/blog/{id}', function (Silex\Application $app, $id) use ($blogPosts) {
//    if (!isset($blogPosts[$id])) {
//        $app->abort(404, "Post $id does not exist.");
//    }
//
//    $post = $blogPosts[$id];
//
//    return  "<h1>{$post['title']}</h1>".
//    "<p>{$post['body']}</p>";
//});
//
//$app->get('/feedback', function () {
//    $html = '<form action="feedback" method="post">'
//        . '<input type="submit" value="click" />';
//    return $html;
//});
//
//$app->post('/feedback', function (Request $request) {
////    $message = $request->get('message');
//    $message = 'sample message';
////    mail('feedback@yoursite.com', '[YourSite] Feedback', $message);
//    mail('flintweather@gmail.com', '[YourSite] Feedback', $message);
//
//    return new Response('Thank you for your feedback!', 201);
//});
//
//


$app->run();
