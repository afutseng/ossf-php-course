<?php

namespace Bob\Profile;

class Builder {}

const PROFILE_PATH = '/profile';

function getProfilePath($name)
{
    return PROFILE_PATH . '/' . ltrim($name, '/');
}

echo '"', __NAMESPACE__, '"', "\n";