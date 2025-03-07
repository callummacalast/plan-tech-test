import { useEffect, useRef, useState } from 'react'

const useDebounce = (value: string, delay: number) => {
  const [debouncedValue, setDebouncedValue] = useState(value)
  const timerRef = useRef<ReturnType<typeof setTimeout> | null>(null)
  useEffect(() => {
    timerRef.current = setTimeout(() => setDebouncedValue(value), delay)

    return () => {
      if (!timerRef.current) return

      clearTimeout(timerRef.current)
    }
  }, [value, delay])

  return debouncedValue
}

export default useDebounce
