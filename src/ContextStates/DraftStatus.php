<?php
namespace Tools\States\ContextStates;

use Tools\States\ContextStates\PendingStatus;
use Tools\States\Contracts\InvoiceStateInterface;

class DraftStatus extends AbstractStatus implements InvoiceStateInterface
{
	protected $status = 'draft';

	public function createNew()
	{
		return $this->alreadyInStatus();
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
		return $this->notAllowed('settle');
	}

}