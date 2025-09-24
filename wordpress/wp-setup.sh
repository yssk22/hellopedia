#!/usr/bin/env bash
set -Eeuo pipefail

wp core language install ja
wp site switch-language ja
wp plugin install wp-maintenance-mode --activate