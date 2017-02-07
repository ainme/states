<?php
namespace Tools\States\ContextStates;

use Tools\States\ContextStates\PendingStatus;
use Tools\States\ContextStates\ProcessedStatus;
use Tools\States\Contracts\InvoiceStateInterface;

class ProcessingStatus extends AbstractStatus implements InvoiceStateInterface
{
	protected $status = 'processing';

	public function createNew()
	{
		return $this->notAllowed('createNew');
	}

	public function send()
	{
		$this->invoiceContext->setInvoiceState(PendingStatus::class);
	}

	public function sendBackToProcessing()
	{
		return $this->notAllowed('sendBackToProcessing');
	}

	public function process()
	{
		return $this->alreadyInStatus();
	}

	public function finishedProcessing()
	{
		$this->invoiceContext->setInvoiceState(ProcessedStatus::class);
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
		return $this->notAllowed('settle');
	}

}