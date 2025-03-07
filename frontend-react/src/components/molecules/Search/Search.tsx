import { useEffect, useState } from 'react'
import { Input } from '../../atoms/Input'
import searchIcon from '../../../assets/icons/search.svg'
import useDebounce from '../../../hooks/useDebounce'
import { useVideos } from '../../../hooks/useVideos'

const Search = () => {
  const { fetchVideos } = useVideos()
  const [search, setSearch] = useState('')
  const debouncedSearch = useDebounce(search, 500)

  useEffect(() => {
    if (debouncedSearch.length >= 3 || debouncedSearch.length === 0) {
      void fetchVideos(debouncedSearch)
    }
  }, [debouncedSearch])

  return (
    <div className="flex items-center justify-center">
      <div className="relative w-72">
        <div className="absolute inset-y-0 left-0 flex items-center pl-2">
          <span className="p-1 ">
            <img src={searchIcon} className="w-5 h-5 " alt="search" />
          </span>
        </div>
        <Input
          placeholder="Search"
          type="search"
          className="w-full py-4 border pl-10 text-sm rounded-md  focus:outline-none bg-gray-50 text-gray-800 focus:bg-gray-50"
          defaultValue={search}
          onChange={(e) => setSearch(e.target.value)}
        />
      </div>
    </div>
  )
}

export default Search
