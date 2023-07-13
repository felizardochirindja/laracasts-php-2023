<?php

namespace Core;

enum Response: int
{
    case NotFound = 404;
    case Forbiden = 403;
}
