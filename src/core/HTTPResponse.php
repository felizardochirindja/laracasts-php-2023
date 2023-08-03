<?php

namespace Core;

enum HTTPResponse: int
{
    case NotFound = 404;
    case Forbiden = 403;
}
