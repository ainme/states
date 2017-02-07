<?php
namespace Tools\States\ContextStates;

use Tools\States\InvoiceContext;

abstract class AbstractStatus
{
	protected $invoiceContext;

	public function __construct(InvoiceContext $invoiceContext)
	{
		$this->invoiceContext = $invoiceContext;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function alreadyInStatus()
	{
		return 'already in ' . $this->getStatus() . '.';
	}

	public function notAllowed($trying)
	{
		return 'unable to change from ' . $trying . ' to ' . $this->getStatus() . ' status.';
	}
}