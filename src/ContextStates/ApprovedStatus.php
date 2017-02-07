<?php
namespace Tools\States\ContextStates;

use Tools\States\ContextStates\HeldStatus;
use Tools\States\ContextStates\ProcessingStatus;
use Tools\States\ContextStates\SettledStatus;
use Tools\States\Contracts\InvoiceStateInterface;

class ApprovedStatus extends AbstractStatus implements InvoiceStateInterface
{
	protected $status = 'approved';

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
		return $this->notAllowed('approve');
	}

	public function approve()
	{
		return $this->alreadyInStatus();
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
		$this->invoiceContext->setInvoiceState(SettledStatus::class);
	}

}