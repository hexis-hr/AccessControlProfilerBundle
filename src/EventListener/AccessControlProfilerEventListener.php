<?php

namespace Hexis\AccessControlProfilerBundle\EventListener;

use Symfony\Component\HttpFoundation\IpUtils;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestMatcher\PathRequestMatcher;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\Profiler\Profiler;

final class AccessControlProfilerEventListener
{
    public ?Profiler $profiler;
    public ?array $allowedProfilerIps;
    public ?string $profilerRoute;

    public function __construct(?Profiler $profiler, ?array $allowedProfilerIps, ?string $profilerRoute)
    {
        $this->allowedProfilerIps = $allowedProfilerIps;
        $this->profiler = $profiler;
        $this->profilerRoute = $profilerRoute;
    }

    public function onKernelRequest(KernelEvent $event): void
    {
        if (!$this->profiler) {
            return;
        }

        $request = $event->getRequest();
        $ip = $request->getClientIp();

        if (!$ip) {
            $this->profiler->disable();
        } else {
            $allowed = IpUtils::checkIp($ip, $this->allowedProfilerIps);

            $pathMatcher = new PathRequestMatcher($this->profilerRoute);

            if (!$allowed) {
                $this->profiler->disable();
            }

            if (!$allowed && $pathMatcher->matches($request)) {
                $response = new RedirectResponse('/');
                $event->setResponse($response);
            }
        }
    }
}
