<?php
namespace Tools\States\ContextStates;

use Tools\States\ContextStates\HeldStatus;
use Tools\States\ContextStates\RejectedStatus;
use Tools\States\Contracts\InvoiceStateInterface;

class SettledStatus extends AbstractStatus implements InvoiceStateInterface
{
	protected $status = 'settled';

	public function createNew()
	{
		return $this->notAllowed('createNew');
	}

	public function send()
	{
		return $this->notAllowed('send');
	}

	public function sendBackToProcessing()
	{
		return $this->notAllowed('sendBackToProcessing');
	}

	public function process()
	{
		return $this->notAllowed('process');
	}

	public function finishedProcessing()
	{
		return $this->notAllowed('finishedProcessing');
	}

	public function approve()
	{
		return $this->notAllowed('approve');
	}

	public function reject($reason)
	{
		return $this->notAllowed('reject');
	}

	public function hold($reason)
	{
		return $this->notAllowed('hold');
	}

	public function settle()
	{
		return $this->alreadyInStatus();
	}

}