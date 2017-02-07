<?php
namespace Tools\States\ContextStates;

use Tools\States\ContextStates\RejectedStatus;
use Tools\States\ContextStates\SettledStatus;
use Tools\States\Contracts\InvoiceStateInterface;

class HeldStatus extends AbstractStatus implements InvoiceStateInterface
{
	protected $status = 'hold';

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
		$this->invoiceContext->setInvoiceState(ProcessingStatus::class);
	}

	public function process()
	{
		$this->invoiceContext->setInvoiceState(ProcessingStatus::class);
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
		$this->invoiceContext->setInvoiceState(RejectedStatus::class, $reason);
	}

	public function hold($reason)
	{
		return $this->alreadyInStatus();
	}

	public function settle()
	{
		return $this->notAllowed('settle');
	}

}