<?php
namespace Tools\States\ContextStates;

use Tools\States\ContextStates\HeldStatus;
use Tools\States\Contracts\InvoiceStateInterface;

class RejectedStatus extends AbstractStatus implements InvoiceStateInterface
{
	protected $status = 'rejected';

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
		return $this->alreadyInStatus();
	}

	public function hold($reason)
	{
		$this->invoiceContext->setInvoiceState(HeldStatus::class, $reason);
	}

	public function settle()
	{
		return $this->notAllowed('settle');
	}

}