<?php
namespace Tools\States\ContextStates;

use Tools\States\ContextStates\DraftStatus;
use Tools\States\ContextStates\ProcessingStatus;
use Tools\States\Contracts\InvoiceStateInterface;

class PendingStatus extends AbstractStatus implements InvoiceStateInterface
{
	protected $status = 'pending';

	public function createNew()
	{
		$this->invoiceContext->setInvoiceState(DraftStatus::class);
	}

	public function send()
	{
		return $this->alreadyInStatus();
	}

	public function sendBackToProcessing()
	{
		return $this->notAllowed('sendBackToProcessing');
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