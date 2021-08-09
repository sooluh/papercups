<?php

namespace Papercups;

use Papercups\Integrations\Github;
use Papercups\Integrations\Slack;
use Papercups\Integrations\Gmail;
use Papercups\Integrations\Twilio;

class Client extends BaseClient
{
    /**
     * @var Users
     */
    private $users;

    /**
     * @var Conversations
     */
    private $conversations;

    /**
     * @var Customers
     */
    private $customers;

    /**
     * @var Messages
     */
    private $messages;

    /**
     * @var Tags
     */
    private $tags;

    /**
     * @var Issues
     */
    private $issues;

    /**
     * @var Notes
     */
    private $notes;

    /**
     * @var Companies
     */
    private $companies;

    /**
     * @var Github
     */
    private $github;

    /**
     * @var Slack
     */
    private $slack;

    /**
     * @var Gmail
     */
    private $gmail;

    /**
     * @var Twilio
     */
    private $twilio;

    /**
     * Method to be called before the function runs
     */
    protected function setUp()
    {
        $this->users = new Users();
        $this->conversations = new Conversations();
        $this->customers = new Customers();
        $this->messages = new Messages();
        $this->tags = new Tags();
        $this->issues = new Issues();
        $this->notes = new Notes();
        $this->companies = new Companies();
        $this->github = new Github();
        $this->slack = new Slack();
        $this->gmail = new Gmail();
        $this->twilio = new Twilio();
    }

    /**
     * Method to retrieve the current user informations
     * @return mixed
     */
    public function me()
    {
        return $this->users->me();
    }

    /**
     * Method to retrieve analytics and statistics around user engagement
     * @param array $query
     * @return mixed
     */
    public function reporting(array $query = [])
    {
        return $this->get('reporting', $query);
    }

    /**
     * A user represents a person with a Papercups account
     * @return Users
     */
    public function users(): Users
    {
        return $this->users;
    }

    /**
     * A conversation represents a thread of messages
     * @return Conversations
     */
    public function conversations(): Conversations
    {
        return $this->conversations;
    }

    /**
     * A customer represents one of your business's users, leads, or contacts
     * @return Customers
     */
    public function customers(): Customers
    {
        return $this->customers;
    }

    /**
     * Represents messages sent from the chat widget, the dashboard, Slack, etc
     * @return Messages
     */
    public function messages(): Messages
    {
        return $this->messages;
    }

    /**
     * Use tags to organize and manage your customers and conversations
     * @return Tags
     */
    public function tags(): Tags
    {
        return $this->tags;
    }

    /**
     * Use issues to track and manage feedback from your customers
     * @return Issues
     */
    public function issues(): Issues
    {
        return $this->issues;
    }

    /**
     * @return Notes
     */
    public function notes(): Notes
    {
        return $this->notes;
    }

    /**
     * View or create companies to group and manage your customers
     * @return Companies
     */
    public function companies(): Companies
    {
        return $this->companies;
    }

    /**
     * Sync and track feature requests and bugs with GitHub
     * @return Github
     */
    public function github(): Github
    {
        return $this->github;
    }

    /**
     * Reply to messages from your customers directly through Slack
     * @return Slack
     */
    public function slack(): Slack
    {
        return $this->slack;
    }

    /**
     * Reply to messages from your customers directly through Gmail
     * @return Gmail
     */
    public function gmail(): Gmail
    {
        return $this->gmail;
    }

    /**
     * Reply to messages from your customers via SMS
     * @return Twilio
     */
    public function twilio(): Twilio
    {
        return $this->twilio;
    }
}
