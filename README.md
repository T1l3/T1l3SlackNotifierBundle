# T1l3SlackNotifierBundle

A simple wrapper for [polem/slack-notifier][1] to send [Slack][2] notifications.

## Installation

### Download T1l3SlackNotifier using composer

Add T1l3SlackNotifier in your composer.json:

    {
        "require": {
            "t1l3/slack-notifier-bundle": "0.1"
        }
    }
Now tell composer to download the bundle by running the command:

    $ php composer.phar update t1l3/slack-notifier-bundle

### Enable the bundle

Enable the bundle in the kernel:

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new T1l3\SlackNotifierBundle\T1l3SlackNotifierBundle(),
        );
    }

### Configure T1l3SlackNotifier

First you need to create an [incoming-webhook][3] in Slack to get your token.
You can also set default Bot name and icon in the Integration Settings part.

Then add it to your config.yml

    # app/config/config.yml
    t1l3_slack_notifier:
        team: yourteam
        token: yOurT0ken

## Usage

You just have to call `t1l3_slack_notifier` service and add a `Slack\Message\Message` to the notify method.

Here is a simple exemple of using it in a controller.

    <?php

    namespace Acme\DemoBundle\Controller;

    // ...
    use Slack\Message\Message;

    class DefaultController extends Controller
    {
        public function indexAction()
        {
            $message = new Message('Hello World!');
            $message->setChannel('#your-chanel')
            ->setIconEmoji(':princess:')
            ->setUsername('Bot')
            ;

            $slackNotifier = $this->get('t1l3_slack_notifier');
            $slackNotifier->notify($message);

            // ...
        }
    }


  [1]: https://github.com/polem/slack-notifier
  [2]: https://slack.com/
  [3]: https://slack.com/services/new/incoming-webhook