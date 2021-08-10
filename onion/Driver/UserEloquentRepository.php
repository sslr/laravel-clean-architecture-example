<?php


namespace Onion\Driver;

use Onion\Entity\User;
use App\Models\User as eloquentUser;

class UserEloquentRepository implements UserRepositoryInterface
{

    public function index($request): array
    {
        return eloquentUser::paginate($request->limit)->toArray();
    }

    public function show(int $id): User
    {
        $eloquentPost = eloquentUser::find($id);

        $user = new User();
        $user->email = $eloquentPost->email;
        $user->name = $eloquentPost->name;
        $user->password = $eloquentPost->password;
        $user->email = $eloquentPost->email;
        $user->created_at = $eloquentPost->created_at;
        $user->updated_at = $eloquentPost->updated_at;

        return $user;
    }

    public function delete(int $id): bool
    {
        try {
            eloquentUser::destroy($id);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function store(User $user): bool
    {
        try {
            eloquentUser::create((array)$user);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}
